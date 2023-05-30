<script id="sadminDashboardTemplate" type="text/x-jsrender">
<tr>
    <td>
        <div class="symbol symbol-45px me-2">
            <span class="text-muted fw-bold d-block">{{:name}}</span>
        </div>
    </td>
    <td>
        <span class="text-muted fw-bold d-block">{{:email}}</span>
    </td>
    <td class="text-start">
    {{if !contact}}
            null
    {{/if}}
        <span class="text-muted fw-bold d-block text-nowrap">{{:contact}}</span>
    </td>
    <td class="text-start text-muted fw-bold">
        {{:registered}}
    </td>
</tr>





</script>
