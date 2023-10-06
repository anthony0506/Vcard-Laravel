
listen('click', '.email-subscribe-delete-btn', function (event) {
    let deleteEmailId = $(event.currentTarget).data('id')
    let url = route('email.sub.destroy', { emailSubscription: deleteEmailId })
    deleteItem(url, Lang.get('messages.subscriptions'));
})
    
