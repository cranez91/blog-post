<template>
    <div class="input-reply">
        <a v-if="!(reply.parent_id == comment.id)" 
            class="px-4 underline text-indigo-600"
            @click.prevent="showReplyBox(comment.id)"
            href="#"
        >
            Reply
        </a>
        <div v-if="reply.parent_id == comment.id" :id="'inp-reply-'+comment.id" class="mt-2 mx-4">
            <div class="sm:col-span-3 mt-3">
                <label for="rep-owner" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input v-model="reply.owner" type="text" id="rep-owner" 
                        class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                </div>
            </div>
            <div>
                <label for="rep-content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea v-model="reply.content" id="rep-content" rows="5" 
                    class="px-2 noresize mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                </textarea>
            </div>

            <div class="mt-6">
                <button type="button" @click.prevent="cleanReply"
                    class="inline-flex items-center px-2 py-1 mr-2 border rounded-md text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Discard
                </button>
                <button type="button" @click.prevent="submitComment(reply)"
                    class="inline-flex items-center px-2 py-1 border border-transparent rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Reply
                </button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  props: ['comment', 'reply'],
  data() {
    return {
      
    };
  },
  methods: {
    submitComment(comment) {
        this.$emit('submitComment', comment);
    },
    cleanReply(){
        this.$emit('cleanReply');
    },
    showReplyBox(commentId){
        this.$emit('showReplyBox', commentId);
    },
  },
};
</script>
