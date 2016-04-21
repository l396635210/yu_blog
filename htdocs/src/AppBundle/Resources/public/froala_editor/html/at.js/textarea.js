/**
 * Created by Administrator on 2016/4/15.
 */

$(function(){
    $('#edit')
        .on('froalaEditor.initialized', function (e, editor) {
            $('#edit').parents('form').on('submit', function () {
                console.log($('#edit').val());
                return false;
            })
        })
        .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
});