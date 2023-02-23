<template>
    <table-render :path_param="['core', 'state']" title="State" :table_fields="table_fields">

        <template #header>
            <th-render>Name</th-render>
            <th-render>Country Code</th-render>
            <th-render>Type</th-render>
            <th-render>Item Id</th-render>
            <th-render>State Code</th-render>
            <th-render>Latitude</th-render>
            <th-render>Longitude</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.name }}</td>
            <td>{{ item.country_code }}</td>
            <td>{{ item.type }}</td>
            <td>{{ item.item_id }}</td>
            <td>{{ item.state_code }}</td>
            <td>{{ item.latitude }}</td>
            <td>{{ item.longitude }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['name', 'country_code', 'type', 'item_id', 'state_code', 'latitude', 'longitude'],
        };
    },
};
</script>
