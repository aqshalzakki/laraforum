require('./bootstrap');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

(function() {
    (function initDiscussionBody() {
        const discussionBody = document.getElementById('discussionBody')
        
        if (discussionBody) {
            ClassicEditor.create(discussionBody)
                .then(editor => console.log(editor))
                .catch(e => console.log(e))
        }
    
    })();
    
    (function initCommentBody() {
        const commentBody = document.getElementById('commentBody')
        
        if (commentBody) {
            ClassicEditor.create(commentBody)
                .then(editor => console.log(editor))
                .catch(e => console.log(e))
        }
    
    })();

})()