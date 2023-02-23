<template>
    <table-render :path_param="['core', 'countrycurrency']" title="Country Currency" :table_fields="table_fields">


        <template #header>
            <th-render>Currency Code</th-render>
            <th-render>Country Code</th-render>
            <th-render>Country Code3</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.currency_code }}</td>
            <td>{{ item.country_code }}</td>
            <td>{{ item.country_code3 }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['currency_code', 'country_code', 'country_code3'],
        };
    },
};
</script>
