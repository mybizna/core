<template>
    <table-edit :path_param="path_param" :model="model">
        <FormKit v-model="model.id" label="Id" id="id" type="hidden" :readonly="true" validation="required" />
        <div class="row">
            <div class="col-md-12">
                <FormKit v-model="model.slug" label="Slug" id="slug" type="text" :readonly="true"
                    validation="required" />
            </div>

            <div class="col-md-6">
                <FormKit v-model="model.short" label="Short" id="short" type="text" :readonly="true"
                    validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.enable_short" label="enable_short" id="enable_short" type="text" :readonly="true"
                    validation="required" />
            </div>

            <div class="col-md-6">
                <FormKit v-model="model.medium" label="Medium" id="medium" type="text" :readonly="true"
                    validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.enable_medium" label="Enable Medium" id="enable_medium" type="text" :readonly="true"
                    validation="required" />
            </div>

            <div class="col-md-6">
                <FormKit v-model="model.long" label="Long" id="long" type="text" :readonly="true"
                    validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.enable_long" label="Enable Long" id="enable_long" type="text" :readonly="true"
                    validation="required" />
            </div>
        </div>
    </table-edit>
</template>

<script>
export default {
    components: {
        TableEdit: window.$func.fetchComponent("components/common/TableEdit.vue")
    },
    data() {
        return {
            id: null,
            path_param: ["core", "notification"],
            model: {
                id: "",
                slug: "",
                short: "",
                medium: "",
                long: "",
                enable_short: "",
                enable_medium: "",
                enable_long: "",
                published: "",
            },
        };
    }
};
</script>
