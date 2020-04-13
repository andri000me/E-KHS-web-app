<script>
	function get(url, data) {

		var tb = $('#data-tb').DataTable({
			"scrollX": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"deferRender": true,
			"ajax": {
				"url": url,
				"type": "POST",
				"data": data,
			},
			"columnDefs": [{
				"targets": [0],
				"visible": false,
			}]
		});
		return tb;

	}

	function post(url, data) {

		var post_dt = $.ajax({
			type: "POST",
			url: url,
			dataType: "JSON",
			data: data,
			success: function (data) {
				notif(data.type, data.text);
				table.ajax.reload();
			},
			error: function (err) {
				console.log(err);
			}
		});
		return post_dt;
	}

	function hapus(url, id) {

		let del = swal({
			title: 'Anda Yakin?',
			icon: "warning",
			text: "Anda Akan Menghapus Data Ini !",
			type: 'warning',
			buttons: {
				cancel: {
					visible: true,
					text: 'Batal!',
					className: 'btn btn-danger'
				},
				confirm: {
					text: 'Ya, Hapus Data!',
					className: 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "GET",
					url: url,
					data: {
						id: id
					},
					success: function (data) {

						notif('success', 'Data Sukses Di Hapus');
						table.ajax.reload();
					}
				});

			}
		});
		return del;

	}

	function set(url, id, data) {
		var set = $.ajax({
			type: "GET",
			url: url,
			dataType: "JSON",
			data: {
				id: id
			},
			success: data,
		});
		return set;


	}

	function changeStatus(text, url, data) {
		let cs = swal({
			title: 'Anda Yakin?',
			icon: "warning",
			text: "Status Mahasiswa Ini Akan Diubah menjadi " + text,
			type: 'warning',
			buttons: {
				cancel: {
					visible: true,
					text: 'Batal!',
					className: 'btn btn-danger'
				},
				confirm: {
					text: 'Ya, Ubah Status!',
					className: 'btn btn-success'
				}
			}
		}).then((willChange) => {
			if (willChange) {
				post(url, data);

			}
		});
		return cs;

	}

	function notif(judul, text) {
		let type, icon;
		if (judul == "success") {
			type = 'success';
			icon = 'flaticon-success'
		} else if (judul == "error") {
			type = 'danger';
			icon = 'flaticon-error'
		}
		$.notify({
			// options
			icon: icon,
			title: judul,
			message: text
		}, {
			// settings
			type: type,
			allow_dismiss: true,
			newest_on_top: true,
			placement: {
				from: "bottom",
				align: "right"
			},
			icon_type: 'class',
			delay: 3000,
			timer: 1000,
			animate: {
				enter: 'animated fadeInUp',
				exit: 'animated fadeOutDown'
			},
		});
	}

</script>
