<template>
    <table-render :path_param="['core', 'timezone']" title="Timezone" :table_fields="table_fields">

        <template #header>
            <th-render>Name</th-render>
            <th-render>Country</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.name }}</td>
            <td>{{ item.country_id__core_country__name }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['name', 'country_id__core_country__name'],
        };
    },
};
</script>
