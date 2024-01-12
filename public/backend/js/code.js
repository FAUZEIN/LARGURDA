$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin ?',
                    text: "Data yang sudah dihapus tidak bisa kembali?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus',
                        'success'
                      )
                    }
                  }) 


    });

  });

$(function(){
    $(document).on('click','#deletesubcategory',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin ?',
                    text: "Data yang ada di sub-sub kategori juga akan terhapus?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus',
                        'success'
                      )
                    }
                  }) 


    });

  });

$(function(){
    $(document).on('click','#deletecategory',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin ?',
                    text: "Data yang ada di sub kategori dan sub-sub kategori juga akan terhapus?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus',
                        'success'
                      )
                    }
                  }) 


    });

  });


// Confirm 

$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status pesanan akan diubah jadi dikonfirmasi?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Konfirmasi!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Dikonfirmasi!',
                        'Status Pesanan Berhasil Diubah',
                        'success'
                      )
                    }
                  }) 


    });

  });

// processing


$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status pesanan akan diubah jadi dikemas?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kemas!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Dikemas!',
                        'Status Pesanan Berhasil Diubah',
                        'success'
                      )
                    }
                  }) 


    });

  });

//picked


$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status pesanan akan diubah jadi dikirim?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kirim!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Dikirim!',
                        'Status Pesanan Berhasil Diubah',
                        'success'
                      )
                    }
                  }) 


    });

  });

// shipped


$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status pesanan akan diubah jadi dalam perjalanan?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Paket Dalam Perjalanan!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Dalam Perjalanan!',
                        'Status Pesanan Berhasil Diubah',
                        'success'
                      )
                    }
                  }) 


    });

  });

  //delivered


  
$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status pesanan akan diubah jadi selesai?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Selesai!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Selesai!',
                        'Status Pesanan Berhasil Diubah',
                        'success'
                      )
                    }
                  }) 


    });

  });