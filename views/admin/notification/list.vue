<template>
    <table-render title="Notification" :path_param="path_param" :search_fields="search_fields" :model="model"
        :table_fields="table_fields"></table-render>
</template>

<script>
export default {
    data() {
        return {
            path_param: ["core", "notification"],
            model: {
                slug: "",
                short: "",
                medium: "",
                long: "",
                enable_short: "",
                enable_medium: "",
                enable_long: "",
                published: "",
            },

            search_fields: [
                { type: "text", name: "slug", label: "Slug", ope: "", },
            ],
            table_fields: [
                { text: "Slug", prop: "slug", name: "slug", },
                { text: "Enable Short", prop: "enable_short", name: "enable_short", is_boolean: true, },
                { text: "Enable Medium", prop: "enable_medium", name: "enable_medium", is_boolean: true, },
                { text: "Enable Long", prop: "enable_long", name: "enable_long", is_boolean: true, },

            ],
        };


    },
};
</script>
