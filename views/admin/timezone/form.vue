<template>
    <edit-render :path_param="['core', 'timezone']" :model="model">
        <div class="row">
            <div class="col-md-6">

                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.name" label="Name" id="name" type="text" validation="required" />
                <FormKit v-model="model.country_id" label="Country" id="country_id" type="text" validation="required" />

            </div>
            <div class="col-md-6">

            </div>
        </div>


    </edit-render>
</template>

<script>
export default {
    data () {
        return {
            id: null,
            model: {
                id: "",
                country_id: "",
                name: "",
            },

        };
    }
};
</script>
