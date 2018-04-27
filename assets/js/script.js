/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
            '//jquery-file-upload.appspot.com/' : 'http://localhost/ci_elearning/uploader',
            uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                        data = $this.data();
                $this
                        .off('click')
                        .text('Abort')
                        .on('click', function () {
                            $this.remove();
                            data.abort();
                        });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(mp4|mp3)$/i,
        maxFileSize: 99999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                        .append('<input type="hidden" name="file[]" value="' + file.name + '"/>');
                //.append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
        if (file.preview) {
            node
                    .prepend('<br>')
                    .prepend(file.preview);
        }
        if (file.error) {
            node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
                'width',
                progress + '%'
                );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                $(data.context.children()[index])
                        .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $('#editor').summernote({
        'height': 300,
        'focus': true,
    });

    $("#owl-demo").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false

    });

    $('[data-toggle="tabs"] a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    
});



/*
 * document.getElementById("opt_A").onchange = function(){
 var reader = new FileReader();
 reader.onload = function(e){
 document.getElementById("optA").src = e.target.result;
 };
 
 reader.readAsDataURL(this.files[0]);
 };
 
 document.getElementById("opt_B").onchange = function(){
 var reader = new FileReader();
 reader.onload = function(e){
 document.getElementById("optB").src = e.target.result;
 };
 
 reader.readAsDataURL(this.files[0]);
 };
 
 document.getElementById("opt_C").onchange = function(){
 var reader = new FileReader();
 reader.onload = function(e){
 document.getElementById("optC").src = e.target.result;
 };
 
 reader.readAsDataURL(this.files[0]);
 };
 
 document.getElementById("opt_D").onchange = function(){
 var reader = new FileReader();
 reader.onload = function(e){
 document.getElementById("optD").src = e.target.result;
 };
 
 reader.readAsDataURL(this.files[0]);
 };
 */
