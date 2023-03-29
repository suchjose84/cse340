function resizeTextArea() {
    var textareas = document.querySelectorAll(".autoSize");
    textareas.forEach(function(textarea) {
        textarea.style.minHeight = '100px';
        textarea.style.maxHeight = '500px';
        textarea.style.height = textarea.scrollHeight + "px";

    });
}
resizeTextArea();

function remainingChars() {
    var textarea = document.querySelectorAll("addReviewArea");
    textarea.style.minHeight = '100px';
    textarea.style.maxHeight = '500px';
    textarea.style.height = 'auto'; // set height to auto

    // show remaining character
    var maxLength = textarea.getAttribute('maxlength');
    var span = document.getElementById('remainingSpan');
    span.innerText = `${maxLength} characters remaining`;

    // update count as user types
    textarea.addEventListener('input', function() {
        var remainingChars = maxLength - textarea.value.length;
        span.innerText = `${remainingChars} characters remaining`;

        // set height to auto again
        textarea.style.height = 'auto';
    });
}
// function remainingChars() {
//     var textarea = document.getElementById("addReviewInput");
//         textarea.style.minHeight = '100px';
//         textarea.style.maxHeight = '500px';
//         textarea.style.height = textarea.scrollHeight + "px";
        
//         // show remaining character
//         var maxLength = textarea.getAttribute('maxlength');
//         var span = document.getElementById('remainingSpan');
//         span.innerText = `${maxLength} characters remaining`;
        
//         // update count as user types
//         textarea.addEventListener('input', function() {
//             var remainingChars = maxLength - textarea.value.length;
//             span.innerText = `${remainingChars} characters remaining`;
    
//         });
// }

remainingChars();