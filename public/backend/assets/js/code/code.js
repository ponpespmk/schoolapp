$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

                  Swal.fire({
                    title: 'Kamu Yakin?',
                    text: "Menghapus Data Ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Tetap hapus!',
                    cancelButtonText: "Batal.!",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Terhapus!',
                        'Data yang dipilih terhapus.',
                        'success'
                      )
                    }
                  })
    });

  });

  // Contoh menggunakan SweetAlert2
    function showAlert(status, message) {
        Swal.fire({
            icon: status === 'success' ? 'success' : 'error',
            title: status === 'success' ? 'Berhasil' : 'Gagal',
            text: message,
        });
    }

    //  Fungsi untuk Fitur Cek Operator Celular
    function checkOperator() {
        // Ambil nilai dari input no_hp
        var noHp = document.getElementById('no_hp').value;

        // Lakukan pengecekan operator berdasarkan pola nomor
        if (noHp.match(/^\+62 8[1-9]\d{1,2}-\d{4}-\d{4}$/)) {
            document.getElementById('operator').innerText = 'Telkomsel';
        } else if (noHp.match(/^\+62 8[2-5]\d{1,2}-\d{4}-\d{4}$/)) {
            document.getElementById('operator').innerText = 'Indosat';
        } else if (noHp.match(/^\+62 8[7-9]\d{1,2}-\d{4}-\d{4}$/)) {
            document.getElementById('operator').innerText = 'XL Axiata';
        } else {
            document.getElementById('operator').innerText = 'Operator tidak dikenal';
        }
    }


// // Event listener untuk form submission
// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.getElementById('myFormRombel'); // Ganti dengan ID form Anda
//     form.addEventListener('submit', function (event) {
//         event.preventDefault();

//         // Kirim form menggunakan fetch
//         fetch(form.action, {
//             method: form.method,
//             body: new FormData(form),
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.status === 'success') {
//                 // Jika sukses, tampilkan SweetAlert2 sukses
//                 showAlert('success', 'Rombel berhasil ditambahkan.');
//                 form.reset(); // Optional: Reset form jika sukses
//             } else {
//                 // Jika gagal, tampilkan SweetAlert2 error dan fokus ke input wali kelas
//                 showAlert('error', 'ID Ustadz sudah digunakan di Rombel lain.');
//                 document.getElementById('ustadz_id').focus(); // Ganti dengan ID input ustadz
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             showAlert('error', 'Terjadi kesalahan. Silakan coba lagi bre.');
//         });
//     });
// });

