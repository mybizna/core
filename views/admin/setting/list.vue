<template>
    <table-render :path_param="['core', 'setting']" title="Setting" :table_fields="table_fields">

        <template #header>
            <th-render>Module</th-render>
            <th-render>Model</th-render>
            <th-render>Name</th-render>
            <th-render>Type</th-render>
            <th-render>Value</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.module }}</td>
            <td>{{ item.model }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.type }}</td>
            <td>{{ item.value }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['module', 'model', 'name', 'type', 'value'],
        };
    },
};
</script>
