{* Smarty *}

{*<table id="sentorders_table" class="table table-striped table-bordered" style="width:100%">*}
{*    <thead>*}
{*    <tr class="active">*}
{*        <th><b>ID order</b></th>*}
{*        <th><b>Referencia</b></th>*}
{*        <th><b>Email del cliente</b></th>*}
{*        <th><b>Monto</b></th>*}
{*        <th><b>CP</b></th>*}
{*        <th><b>Fecha de orden</b></th>*}
{*        <th><b>Envío de mail</b></th>*}
{*        <th><b>ID estado</b></th>*}
{*        <th><b>ID cliente</b></th>*}
{*        <th></th>*}
{*    </tr>*}
{*    </thead>*}

{*    <tbody>*}
{*    {foreach from=$orders item=order} *}{* Trae los registros de órdenes*}
{*        <tr>*}
{*            <td style="width:8%"><input type='text' id='id_order_{$order.id_order}' disabled class='form-control'*}
{*                                        value="{if 'id_order'|array_key_exists:$order}{$order.id_order}{/if}"/>*}
{*            </td>*}

{*            <td style="width:10%"><input type='text' id='reference_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'reference'|array_key_exists:$order}{$order.reference}{/if}"/>*}
{*            </td>*}

{*            <td style="width:20%"><input type='email' id='email_customer_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'email_customer'|array_key_exists:$order}{$order.email_customer}{/if}"/>*}
{*            </td>*}

{*            <td style="width:10%"><input type='text' id='amount_order_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'amount'|array_key_exists:$order}{$order.amount}{/if}"/>*}
{*            </td>*}

{*            <td style="width:10%"><input type='text' id='cp_customer_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'cp_customer'|array_key_exists:$order}{$order.cp_customer}{/if}"/>*}
{*            </td>*}

{*            <td style="width:15%"><input type='datetime' id='date_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'date'|array_key_exists:$order}{$order.date}{/if}"/>*}
{*            </td>*}

{*            <td style="width:15%"><input type='datetime' id='date_sent_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'date_sent'|array_key_exists:$order}{$order.date_sent}{/if}"/>*}
{*            </td>*}

{*            <td style="width:5%"><input type='text' id='id_state_{$order.id_order}' class='form-control'*}
{*                                        value="{if 'id_state'|array_key_exists:$order}{$order.id_state}{/if}"/>*}
{*            </td>*}

{*            <td style="width:10%"><input type='text' id='id_customer_{$order.id_order}' class='form-control'*}
{*                                         value="{if 'id_customer'|array_key_exists:$order}{$order.id_customer}{/if}"/>*}
{*            </td>*}

{*        </tr>*}
{*    {/foreach}*}

{*    </tbody>*}
{*</table>*}
