window.livewire.on('product_file_selected', () => {
    try {
        let file = event.target.files[0];
        if(file){
            let reader = new FileReader();

            reader.onloadend = () => {
                window.livewire.emit('product_file_uploaded', reader.result);
            }
            reader.readAsDataURL(file);
        }
    } catch (error) {
        console.log(error);
    }
});