<script>
    $('[data-mask]').inputmask();

    toastr.options = {
        "positionClass": "toast-top-center",
        "timeOut": "2000"
    }

    $('#file').change(function() {
        var file = $('#file')[0].files[0].name;
        $('#label-file').text(file);
        $('#file-selected').val(1)
    });

    $('#file-school').change(function() {
        var fileSchool = $('#file-school')[0].files[0].name;
        $('#label-file-school').text(fileSchool);
        $('#file-selected-school').val(1)
    });

    $('#import-file').on('click', function() {
        let fileSelected = $('#file-selected').val()
        if (fileSelected == '') {
            toastr.error('Oppss..! Pastikan file sudah dipilih')
            return false
        }
        $('#form-import-student').submit()
    })

    $('#import-file-school').on('click', function() {
        let fileSelected = $('#file-selected-school').val()
        if (fileSelected == '') {
            toastr.error('Oppss..! Pastikan file sudah dipilih')
            return false
        }
        $('#form-import-school').submit()
    })

    const addRoom = e => {
        e.preventDefault()
        $('#modal-room').modal('show')
    }

    const editRoom = (id, e) => {
        e.preventDefault()
        $.ajax({
            url: '<?= base_url() ?>setting/getroomByid',
            method: 'POST',
            data: {
                id
            },
            dataType: 'JSON',
            success: function(response) {

                let status = response.status
                if (status == 400) {
                    toastr.error('Oppss..! Data tak ditemukan')
                    return false
                }

                $('#id').val(response.data.id)
                $('#name').val(response.data.name)
                $('#head').val(response.data.head)
                $('#modal-room').modal('show')
            }
        })
    }

    $('#save-room').on('click', function() {
        let name = $('#name').val()
        let head = $('#head').val()
        if (name == '' || head == '') {
            toastr.error('Oppss..! Pastikan semua inputan telah diisi')
            $('#name').focus()
            return false
        }

        $.ajax({
            url: '<?= base_url() ?>setting/room',
            method: 'POST',
            data: $('#form-room').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                $('#save-room').prop('disabled', true)
            },
            success: function(response) {
                $('#save-room').prop('disabled', false)
                let status = response.status
                if (status == 400) {
                    toastr.error(`Oppss..! ${response.message}`)
                    return false
                }
                loadroom()
                toastr.success(`Yeaahh..! ${response.message}`)
                $('#modal-room').modal('hide')
            }
        })
    })

    $('#modal-room').on('hidden.bs.modal', () => {
        $('#form-room')[0].reset();
        $('#id').val(0)
    })

    $('#modal-room').on('shown.bs.modal', () => {
        $('#name').focus().select()
    })

    const deleteRoom = (id, e) => {
        e.preventDefault()
        Swal.fire({
            title: 'Anda Yakin?',
            text: 'Akan menghapus satu data kamar',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin dong',
            cancelButtonText: 'Nggak jadi'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>setting/deleteroom',
                    method: 'POST',
                    data: {
                        id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        let status = response.status
                        if (status == 400) {
                            toastr.error(`Oppss..! ${response.message}`)
                            return false
                        }
                        loadroom()
                        toastr.success(`Yeaahh..! ${response.message}`)
                    }
                })
            }
        })
    }
</script>
</body>

</html>