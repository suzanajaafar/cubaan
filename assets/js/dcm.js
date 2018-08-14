function save()
  {
  	swal("Berjaya!", "Rekod telah berjaya disimpan!", "success");
  }

  function submitrec()
  {
  	swal("Berjaya!", "Rekod telah berjaya dihantar!", "success");
  }
  
  function send_notification()
  {
  	swal("Berjaya!", "Notifikasi telah dihantar!", "success");
  }
  
  function print()
  {
  	swal("Perhatian!", "Cetakan akan bermula sebentar lagi.. !", "success");
  }
  
  function download()
  {
  	swal("Perhatian!", "Fail akan dimuat turun sebentar lagi.. !", "success");
  }
  
  function verified()
  {
  	swal("Berjaya!", "Verifikasi berjaya.. !", "success");
  }
  
  function docapproval()
  {
  	swal("Berjaya!", "Kebenaran telah dihantar.. !", "success");
  }
  
  function createfile()
  {
  	swal("Berjaya!", "Fail baru telah dibuat.. !", "success");
  }
  
  function updatefile()
  {
  	swal("Berjaya!", "Fail telah dikemaskini.. !", "success");
  }
  
  function deleterec()
  {
	  swal({
		  title: "Adakah anda pasti?",
		  text: "Tindakan ini tidak boleh diundur!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Pasti!",
		  closeOnConfirm: false
		},
		function(){
		  swal("Berjaya Dipadam!", "Rekod telah berjaya dipadam", "success");
		});
  }
  
  
  
  
  
  
  