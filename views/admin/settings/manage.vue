<template>
    <table-edit :path_param="path_param" :model="model">

        <ul class="nav nav-tabs" id="myPayment" role="tablist">
            <li v-for="(setting, s_index) in settings" v-bind:key="s_index" class="nav-item" role="presentation">
                <button :class="!s_index ? 'nav-link active' : 'nav-link'" :id="s_index + '-tab'" data-bs-toggle="tab"
                    :data-bs-target="'#' + s_index" type="button" role="tab" :aria-controls="s_index"
                    :aria-selected="!s_index ? 'true' : 'false'">
                    <i class="fas fa-check-circle"></i>
                    {{
                            setting.title
                    }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myPaymentContent">
            <div v-for="(setting, s_index) in settings" v-bind:key="s_index"
                :class="!s_index ? 'tab-pane fade show active' : 'tab-pane fade'" :id="s_index" role="tabpanel"
                :aria-labelledby="s_index + '-tab'">
                <div class="p-2">
                    <FormKit label="Amount" id="amount" type="number" validation="required"
                        v-model="setting.paid_amount" @keyup="calculateTotal" />
                    <FormKit label="Reference" id="reference" type="text" v-model="setting.reference" />
                    <FormKit label="Others" id="others" type="text" v-model="setting.others" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <FormKit label="Id" id="id" type="hidden" validation="required" />
                <FormKit label="Title" id="title" type="text" validation="required" />
                <FormKit label="Slug" id="slug" type="text" validation="required" />
                <FormKit label="Value" id="value" type="text" validation="required" />
                <FormKit label="Start Amount" id="start_amount" type="text" validation="required" />
                <FormKit label="End Amount" id="end_amount" type="text" validation="required" />
            </div>
            <div class="col-md-6">
                <FormKit label="Is Percent" id="is_percent" type="text" validation="required" />
                <FormKit label="Is Visible" id="is_visible" type="text" validation="required" />
                <FormKit label="Published" id="published" type="text" validation="required" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <FormKit label="File Limit" id="file_limit" type="text" validation="required" />
                <FormKit label="File Type" id="file_type" type="text" validation="required" />
                <FormKit label="File Structure" id="file_structure" type="text" validation="required" />
                <FormKit label="File Suffix" id="file_suffix" type="text" validation="required" />
            </div>
        </div>

    </table-edit>
</template>

<script>
export default {
    components: {
        TableEdit: window.$func.fetchComponent("components/common/TableEdit.vue")
    },
    data () {
        return {
            settings: {},
        }
    },
    updated () {

    },

    methods: {
        getNow: function () {

        },
        fetchData () {

            var comp_url = 'fetch_settings/';

            const getdata = async (t) => {

                await window.axios.get(comp_url)
                    .then(
                        response => {
                            t.settings = response.data;
                        });
            };

            getdata(this);
        },
    }
};
</script>
