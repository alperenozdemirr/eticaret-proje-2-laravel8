

    var images = document.getElementById("images");
    var preview = document.getElementById("preview");
    images.addEventListener('change',function(){
        preview.innerHTML='';
        [...this.files].map(file => {
            const reader = new FileReader();
            reader.addEventListener('load',function(){
                const image = new Image();
                image.title= file.name;
                image.src= this.result;
                image.width="200px";
                preview.appendChild(image);
            });
            reader.readAsDataURL(file);
        });
    });
