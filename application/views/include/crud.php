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

				swal(data.type, data.text, {
					icon: data.type,
					buttons: {
						confirm: {
							className: 'btn btn-danger'
						}
					},
				});
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

						swal("Data Seukses Dihapus", {
							icon: "success",
							buttons: {
								confirm: {
									className: 'btn btn-success'
								}
							}
						});
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

</script>
