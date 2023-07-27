<template>
    <div class="mt-12 border-t border-gray-200">
        <div class="py-8">
            <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
            <div v-if="comments.length == 0" class="mt-4">
                <h5>Be the first one to add a comment!</h5>
            </div>
            <CommentRecursive
                v-if="comments.length > 0"
                :comments="comments"
                :reply="reply"
                @showReplyBox="showReplyBox"
                @cleanReply="cleanReply"
                @submitComment="submitComment"
            />
        </div>
        <div class="mt-12">
          <h2 class="text-xl font-semibold text-gray-800">Add Comment</h2>
            <div class="sm:col-span-3 mt-3">
                <label for="owner" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input v-model="newComment.owner" type="text" name="owner" id="owner" 
                        class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                </div>
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea v-model="newComment.content" id="content" rows="5" 
                    class="px-2 noresize mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                </textarea>
            </div>

            <div class="mt-6">
              <button type="button" @click.prevent="submitComment(newComment)"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Comment
              </button>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import Swal from 'sweetalert2';
    import CommentRecursive from './CommentRecursive.vue';

    export default {
        components: {
            CommentRecursive
        },
        data() {
            return {
                newComment: {
                    content: '',
                    owner: '',
                },
                reply: {
                    content: '',
                    owner: '',
                    parent_id: '',
                },
                errors: {},
                comments: []
            };
        },
        mounted() {
            this.fetchComments();
        },
        methods: {
            submitComment(comment) {
                const formData = new FormData();
                formData.append('content',comment.content);
                formData.append('owner',comment.owner);
                if (comment.hasOwnProperty('parent_id') && comment.parent_id) {
                    formData.append('parent_id',comment.parent_id);
                }
                axios.post('/api/comments', formData)
                    .then(response => {
                        if (comment.hasOwnProperty('parent_id') && comment.parent_id) {
                            this.cleanReply();
                        } else {
                            this.cleanComment();
                        }
                        this.comments = response.data.data;
                        Swal.fire('Success', 'Your comment has been submitted', 'success');
                    })
                    .catch(error => {
                        console.log(error);
                        Swal.fire('Error', error.response.data.message, 'error');
                    });
            },
            fetchComments() {
                axios.get('/api/comments')
                .then(response => {
                    this.comments = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
            },
            cleanComment(){
                this.newComment =  {
                    content: '',
                    owner: '',
                };
            },
            cleanReply(){
                this.reply =  {
                    content: '',
                    owner: '',
                    parent_id: '',
                };
            },
            showReplyBox(commentId){
                this.reply =  {
                    content: '',
                    owner: '',
                    parent_id: commentId,
                };
            }
        },
    };
</script>
<style>
    .noresize {
        resize: none;
    }
</style>