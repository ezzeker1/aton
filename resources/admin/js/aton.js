/* 
 * @author: Ahmed Samy
 * @date : 10/05/2013
 * 
 */
$(document).ready(function() {
   $('.nav-tabs li a').on('click',function(e){
//       e.preventDefault();
//       init_tinymce();
   });   
});
function trigger_upload(id)
{
    document.getElementById(id).click();
}
function readURL(input,img) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var id = '#'+img;
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
 $('a.confirm-popup').live ('click', function (e) {
     var anchor=$(this);
     e.preventDefault();
    $.msgbox("Are you sure that you want to permanently delete the selected item?", {
        type: "confirm",
        buttons : [
            {type: "submit", value: 'Yes'},
            {type: "submit", value: 'No'},
            {type: "cancel", value: "Cancel"}
        ]
        }, function(result) {
            if(result=='Yes')
               window.location.href=anchor.attr('href');
            else
                return false
    });
}); 