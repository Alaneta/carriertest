{* Smarty *}
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<form method="POST" action="{$url}">
  <div class="form-group">
    <label for="carrierName">Nombre del transportista</label>
    <input type="text" class="form-control" id="carrierName" name="carrierName" aria-describedby="emailHelp"
           placeholder="Ingrese nombre del nuevo transportista">
  </div>
  <div class="form-group">
    <label for="logisticHubCarrierId">Id del transportista del Hub Logístico</label>
    <input type="text" class="form-control" id="logisticHubCarrierId" name="logisticHubCarrierId" placeholder="Ingrese el ID del transportista del Hub Logístico">
  </div>
  <button id="btnSubmitConfig" class="btn btn-primary">Guardar</button>
</form>

