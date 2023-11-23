export function clickToTopic(topic) {
    if (JSON.parse(topic).parent_id === undefined) {
        let url = window.location.href.slice(0, -1)
        url += '/' + JSON.parse(topic).id + '/show'
        window.location.href = url
    }
    else if (JSON.parse(topic).parent_id === null) {
        window.location.href += 'topic/' + JSON.parse(topic).id + '/posts'
    }
    else {
        window.location.href = '/topic/' + JSON.parse(topic).id + '/posts'
    }
}
