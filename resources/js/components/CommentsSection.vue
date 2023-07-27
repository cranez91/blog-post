<template>
    <div class="mt-12 border-t border-gray-200">
        <div class="py-8">
          <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
          <!-- Aquí puedes mostrar la lista de comentarios -->
          <div v-if="comments.length == 0" class="mt-4">
              <h5>Be the first one to add a comment!</h5>
          </div>
          <div v-for="comment in comments" :key="comment.id" class="mt-4">
            <p class="text-sm font-semibold text-gray-600">{{ comment.owner }}</p>
            <p class="mt-1 text-gray-800">{{ comment.content }}</p>
          </div>
        </div>
        <div class="mt-12">
          <h2 class="text-xl font-semibold text-gray-800">Add Comment</h2>
          <form class="mt-4">
            <div class="sm:col-span-3">
                <label for="owner" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input 
                        v-model="newComment.owner" 
                        type="text" 
                        name="owner" 
                        id="owner" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                </div>
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea 
                    v-model="newComment.content" 
                    id="content" 
                    rows="5" 
                    class="noresize mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                </textarea>
            </div>

            <div class="mt-6">
              <button 
                type="button" 
                @click.prevent="submitComment"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Comment
              </button>
            </div>
          </form>
        </div>
    </div>
</template>
<script>
    export default {
    data() {
        return {
        newComment: {
            content: '',
            owner: '',
        },
        errors: {},
        comments: []
        };
    },
    methods: {
        submitComment() {
            this.comments.unshift(this.newComment);
            this.newComment =  {
                content: '',
                owner: '',
            };
        },
    },
    };
</script>
<style>
    .noresize {
        resize: none;
    }
</style>