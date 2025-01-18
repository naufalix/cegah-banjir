<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#laporkan">
  <i class="bi bi-exclamation-triangle-fill"></i> Laporkan
</button>
<div class="modal fade" id="laporkan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger">
          <i class="bi bi-exclamation-triangle-fill"></i> Laporkan konten
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label class="mb-2" for="">Alasan :</label>
            <textarea class="form-control" id="reason" rows="5"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="laporkan()" data-bs-dismiss="modal">Laporkan</button>
      </div>
    </div>
  </div>
</div>
<script>
  function laporkan(){
    const reason = document.getElementById('reason').value;
    const currentUrl = window.location.href;

    // Format pesan WhatsApp
    const message = `Halo, saya ingin laporkan mengenai konten pada website CegahBanjir dengan alasan ${encodeURIComponent(reason)}.%0AURL = ${encodeURIComponent(currentUrl)}`;
    const whatsappUrl = `https://wa.me/085234006051?text=${message}`;

    // Redirect ke WhatsApp
    window.open(whatsappUrl, '_blank');
  };
</script>