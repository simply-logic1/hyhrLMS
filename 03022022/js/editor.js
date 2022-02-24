function example_image_upload_handler (blobInfo, success, failure, progress) {
    var xhr, formData;
  
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    var url_upload= baseURL+'admin/upload_img';
    xhr.open('POST', url_upload);
  
    xhr.upload.onprogress = function (e) {
      progress(e.loaded / e.total * 100);
    };
  
    xhr.onload = function() {
      var json;
  
      if (xhr.status === 403) {
        failure('HTTP Error: ' + xhr.status, { remove: true });
        return;
      }
  
      if (xhr.status < 200 || xhr.status >= 300) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }
  
      json = JSON.parse(xhr.responseText);
  
      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }
  
      success(json.location);
    };
  
    xhr.onerror = function () {
      failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };
  
    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
  
    xhr.send(formData);
  };
  
  var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  var url_upload= baseURL+'admin/upload_img';
  tinymce.init({
    selector: 'textarea#open-source-plugins',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    images_upload_handler: example_image_upload_handler,
   
    /*
    file_picker_callback: function (callback, value, meta) {
      /* Provide file and text for the link dialog 8
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
      }
  
      /* Provide image and alt text for the image dialog8
      if (meta.filetype === 'image') {
           
          /*
           var input = document.createElement('input');
              input.setAttribute('type', 'file');
              input.setAttribute('accept', 'image/*');
              input.onchange = function () {
                  var file = this.files[0];
                  console.log(file.name);
                  var reader = new FileReader();
                  reader.onload = function () {
                      var id = 'blobid' + (new Date()).getTime();
                      var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                      var base64 = reader.result.split(',')[1];
                      var blobInfo = blobCache.create(id, file, base64);
                      blobCache.add(blobInfo);
                      console.log(blobInfo);
                      /* call the callback and populate the Title field with the file name  
                      callback(blobInfo.blobUri(), {title: file.name});
                  };
                  reader.readAsDataURL(file);
              };
              input.click(); 
              var xhr, formData;

              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
             var url_upload= baseURL+'admin/upload_img';
              xhr.open('POST', url_upload);
          
              xhr.onload = function() {
                var json;
          
                if (xhr.status != 200) {
                  console.log('HTTP Error: ' + xhr.status);
                  return;
                }
          
                json = JSON.parse(xhr.responseText);
          
                if (!json || typeof json.location != 'string') {
                  console.log('Invalid JSON: ' + xhr.responseText);
                  return;
                }
          
                success(json.location);
              };
          
              formData = new FormData();
             // formData.append('file', callback.blob(), callback.filename());
          
              xhr.send(formData);
             
              
      }
  
      /* Provide alternative source and posted for the media dialog 8
      if (meta.filetype === 'media') {
        var input = document.createElement('input');
              input.setAttribute('type', 'file');
              /*input.setAttribute('accept', 'image/*');
              input.onchange = function () {
                  var file = this.files[0];
  
                  var reader = new FileReader();
                  reader.onload = function () {
                      var id = 'blobid' + (new Date()).getTime();
                      var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                      var base64 = reader.result.split(',')[1];
                      var blobInfo = blobCache.create(id, file, base64);
                      blobCache.add(blobInfo);
  
                      /* call the callback and populate the Title field with the file name 8
                      cb(blobInfo.blobUri(), {title: file.name});
                  };
                  reader.readAsDataURL(file);
              };
              input.click();
      }
    },
    */
   file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.onchange = function () {
        var file = this.files[0];
        var reader = new FileReader();
                        
        // FormData
        var fd = new FormData();
        var files = file;
        fd.append('filetype',meta.filetype);
        fd.append("file",files);

        var filename = "";

        // AJAX
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', url_upload);

        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                console.log('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                console.log('Invalid JSON: ' + xhr.responseText);
                return;
            }
            console.log(json.location);
            filename = json.location;
        };
        xhr.send(fd);
        
                            console.log(filename+"Dasda");                                    
        reader.onload = function(e) {
            cb(filename);
            console.log(filename+"FSD");
        };
        console.log(file);
        reader.readAsDataURL(file); 
        return
    };

    input.click();
},                 

       
 

    
    
    templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   });
  
  
  
    