


export const ajaxSetup =()=>{
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}

export const openModal =(modalId)=>{
$(modalId).modal('show')
}
export const closeModal =(modalId)=>{
$(modalId).modal('hide')
}