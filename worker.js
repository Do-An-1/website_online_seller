self.addEventListener('message', function(e) {
  var files = e.data;
  var buffers = [];

  // Read each file synchronously as an ArrayBuffer and
  // stash it in a global array to return to the main app.
  [].forEach.call(files, function(file) {
    var reader = new FileReaderSync();
    buffers.push(reader.readAsArrayBuffer(file));
  });

  postMessage(buffers);
}, false);