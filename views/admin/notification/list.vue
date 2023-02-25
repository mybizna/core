<template>
    <table-render :path_param="['core', 'notification']" title="Notification" :table_fields="table_fields">


        <template #header>
            <th-render>Slug</th-render>
            <th-render>Enable Short</th-render>
            <th-render>Enable Medium</th-render>
            <th-render>Enable Long</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.slug }}</td>
            <td>{{ item.enable_short }}</td>
            <td>{{ item.enable_medium }}</td>
            <td>{{ item.enable_lengthy }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['slug', 'enable_short', 'enable_medium', 'enable_lengthy'],
        };


    },
};
</script>
