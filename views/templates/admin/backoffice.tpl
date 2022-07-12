{if $successMsg}
	<div class="alert alert-success">{l s=$successMsg mod='carriertest'}</div>
{/if}
{if $errorMsg}
  <div class="alert alert-danger">{l s=$errorMsg mod='carriertest'}</div>
{/if}
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#config" role="tab" data-toggle="tab">Configuración</a></li>
	<li><a href="#carriers" role="tab" data-toggle="tab">Transportistas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="config">{include file='./config.tpl'}</div>
	<div class="tab-pane" id="carriers">{include file='./carriers.tpl'}</div>
</div>
