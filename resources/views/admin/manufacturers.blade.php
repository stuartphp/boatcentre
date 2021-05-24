@extends('layouts.app')
@section('content')
@livewire('admin.manufacturers')
@endsection
@section('scripts')
    <script>
     /**
     * An alpinejs app that handles CKEditor's lifecycle
     */
    function ckeditor() {
        return {
            /**
             * The function creates the editor and returns its instance
             * @param $dispatch Alpine's magic property
             */
            create: async function($dispatch) {
                // Create the editor with the x-ref
                const editor = await ClassicEditor.create(this.$refs.ckEditor);
                // Handle data updates
                editor.model.document.on('change:data', function() {
                    $dispatch('input', editor.getData())
                });
                // return the editor
                return editor;
            },
            /**
             * Initilizes the editor and creates a listener to recreate it after a rerender
             * @param $dispatch Alpine's magic property
             */
            init: async function($dispatch) {
                // Get an editor instance
                const editor = await this.create($dispatch);
                // Set the initial data
                //editor.setData('{{ old('model_specifications') }}')
                // Pass Alpine context to Livewire's
                const $this = this;
                // On reinit, destroy the old instance and create a new one
                Livewire.on('reinit', async function(e) {
                    editor.setData('');
                    editor.destroy()
                        .catch( error => {
                            console.log( error );
                        } );
                    await $this.create($dispatch);
                });
            }
        }
    }

    </script>
@endsection

