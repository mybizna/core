<template>
    <edit-render :path_param="['core', 'notification']" :model="model">
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
                <FormKit v-model="model.lengthy" label="Long" id="long" type="text" :readonly="true"
                    validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit v-model="model.enable_lengthy" label="Enable Long" id="enable_lengthy" type="text" :readonly="true"
                    validation="required" />
            </div>
        </div>
    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            model: {
                id: "",
                slug: "",
                short: "",
                medium: "",
                lengthy: "",
                enable_short: "",
                enable_medium: "",
                enable_lengthy: "",
                published: "",
            },
        };
    }
};
</script>
