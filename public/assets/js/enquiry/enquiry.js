listenClick(".view-btn",(function(e){var a,s=$(e.currentTarget).data("id");a=s,$.ajax({url:route("enquiry.show",a),type:"GET",success:function(e){e.success&&($("#showName").text(e.data.name),$("#showEmail").text(e.data.email),null!=e.data.phone?$("#showPhone").text(e.data.phone):$("#showPhone").text("N/A"),$("#showMessage").text(e.data.message),$("#showEnquiryModal").modal("show"))},error:function(e){displayErrorMessage(e.responseJSON.message)}})})),listenClick(".view-btn",(function(e){var a=$(e.currentTarget).data("id");$.ajax({url:route("enquiry.show",a),type:"GET",success:function(e){e.success&&($("#vcardName").text(e.data.vcard.name),$("#showName").text(e.data.name),$("#showEmail").text(e.data.email),null!=e.data.phone?$("#showPhone").text(e.data.phone):$("#showPhone").text("N/A"),$("#showMessage").text(e.data.message),$("#showEnquiriesModal").modal("show"))},error:function(e){displayErrorMessage(e.responseJSON.message)}})}));