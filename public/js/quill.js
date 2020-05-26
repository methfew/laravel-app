// Initialize Quill editor


  var quill = new Quill('#editor', {
    modules: {
    toolbar: [
          ['bold', 'italic', 'underline'],
          ['link'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
    },
    placeholder: 'Opis...',
    theme: 'snow'
  });

  
  
  quill.on('text-change', function(delta, source) {
    var delta = quill.getContents();
    console.log(delta.ops);
    var qdc = new window.QuillDeltaToHtmlConverter(delta.ops, window.opts_ || {});
    var html = qdc.convert();
    console.log(html);
    document.getElementById('description').value = html;
  });

