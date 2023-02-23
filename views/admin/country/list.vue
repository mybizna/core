<template>
    <table-render :path_param="['core', 'country']" title="Country" :table_fields="table_fields">

        <template #header>
            <th-render>Name</th-render>
            <th-render>Code</th-render>
            <th-render>Code3</th-render>
            <th-render>Latitude</th-render>
            <th-render>Longitude</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.name }}</td>
            <td>{{ item.code }}</td>
            <td>{{ item.code3 }}</td>
            <td>{{ item.latitude }}</td>
            <td>{{ item.longitude }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['name', 'code', 'code3', 'latitude', 'longitude'],
        };
    },
};
</script>
