<template>
    <table-render :path_param="['core', 'currency']" title="Currency" :table_fields="table_fields">

        <template #header>
            <th-render>Name</th-render>
            <th-render>Code</th-render>
            <th-render>Symbol</th-render>
            <th-render>Rate</th-render>
            <th-render>Buying</th-render>
            <th-render>Selling</th-render>
            <th-render>Published</th-render>
            <th-render>Is Fetched</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.name }}</td>
            <td>{{ item.code }}</td>
            <td>{{ item.symbol }}</td>
            <td>{{ item.rate }}</td>
            <td>{{ item.buying }}</td>
            <td>{{ item.selling }}</td>
            <td class="text-center">
                <btn-status :status="item.published"></btn-status>
            </td>
            <td class="text-center">
                <btn-status :status="item.is_fetched"></btn-status>
            </td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['name', 'code', 'symbol', 'rate', 'buying', 'selling', 'published', 'is_fetched'],
        };
    },
};
</script>
