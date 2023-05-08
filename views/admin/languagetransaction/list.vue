<template>
    <table-render :path_param="['core', 'languagetranslation']" title="Language Translation" :table_fields="table_fields">

        <template #header>
            <th-render>Slug</th-render>
            <th-render>Language</th-render>
            <th-render>Phrase</th-render>
        </template>
      
        <template #body="{ item }">
            <td>{{ item.slug }}</td>
            <td>{{ item.language }}</td>
            <td>{{ item.phrase }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['slug', 'language', 'phrase'],
        };
    },
};
</script>
