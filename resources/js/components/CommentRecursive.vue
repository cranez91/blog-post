<template>
    <div v-for="comment in comments" :key="comment.id" class="py-2 mt-2 mx-4 border-t border-gray-200">
      <p class="text-sm font-semibold text-gray-600">{{ comment.owner }}</p>
      <p class="mt-1 text-gray-800">{{ comment.content }}</p>
      <Reply
        :comment="comment"
        :reply="reply"
        @showReplyBox="showReplyBox"
        @cleanReply="cleanReply"
        @submitComment="submitComment"
      />
      <CommentRecursive
        v-if="comment.replies.length > 0"
        :comments="comment.replies"
        :reply="reply"
        @showReplyBox="showReplyBox"
        @cleanReply="cleanReply"
        @submitComment="submitComment"
      />
    </div>
</template>

<script>
import Reply from './Reply.vue';

export default {
  components: {
    Reply,
  },
  props: ['comments', 'reply'],
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
