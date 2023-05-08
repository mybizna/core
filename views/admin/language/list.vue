<template>
    <table-render :path_param="['core', 'language']" title="Language" :table_fields="table_fields">

        <template #header>
            <th-render>name</th-render>
            <th-render>Slug</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.name }}</td>
            <td>{{ item.slug }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['name', 'slug'],
        };
    },
};
</script>
