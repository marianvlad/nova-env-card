<template>
    <card class="flex bg-90 flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl text-80 font-light">
            	<button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 border border-blue-darker rounded" @click.prevent="handleButton">
            		Edit Environment File
            </button>
            </h1>
        </div>

        <portal to="modals">
            <transition name="fade">
                <modal v-if="isModalOpen">
			        <div class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 800px;">
			            <div class="p-8">
			                <heading :level="2" class="mb-6">Edit Environment File</heading>
			                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="20" v-model="content"></textarea>
			            </div>

			            <div class="bg-30 px-6 py-3 flex">
			                <div class="ml-auto">
			                    <button type="button" data-testid="cancel-button" @click.prevent="handleCancel" class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">Cancel</button>
			                    <button ref="confirmButton" data-testid="confirm-button" @click.prevent="handleSave" class="btn btn-default btn-danger">Save</button>
			                </div>
			            </div>
			        </div>
			    </modal>
            </transition>
        </portal>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
        	content: '',
            isModalOpen: false
        }
    },

    mounted() {
        //
    },

    methods: {
    	handleButton() {
    		this.isModalOpen = true

    		this.content = ' asasa'
    	},

        handleCancel() {
        	this.isModalOpen = false
        },

        handleSave() {
            // set button with loading state
            // send modifier .env to controller
            // hide modal
        },
    },
}
</script>
