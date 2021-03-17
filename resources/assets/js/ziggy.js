    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"],"domain":null},"user-password.update":{"uri":"user\/password","methods":["PUT"],"domain":null},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"],"domain":null},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"],"domain":null},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"],"domain":null},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"],"domain":null},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"],"domain":null},"home":{"uri":"\/","methods":["GET","HEAD"],"domain":null},"contact":{"uri":"contact","methods":["POST"],"domain":null},"dashboard":{"uri":"admin","methods":["GET","HEAD"],"domain":null},"service.index":{"uri":"admin\/service","methods":["GET","HEAD"],"domain":null},"service.create":{"uri":"admin\/service\/create","methods":["GET","HEAD"],"domain":null},"service.store":{"uri":"admin\/service","methods":["POST"],"domain":null},"service.show":{"uri":"admin\/service\/{service}","methods":["GET","HEAD"],"domain":null},"service.edit":{"uri":"admin\/service\/{service}\/edit","methods":["GET","HEAD"],"domain":null},"service.update":{"uri":"admin\/service\/{service}","methods":["PUT","PATCH"],"domain":null},"service.destroy":{"uri":"admin\/service\/{service}","methods":["DELETE"],"domain":null},"service.restore":{"uri":"admin\/service-restore\/{id}","methods":["GET","HEAD"],"domain":null},"project.index":{"uri":"admin\/project","methods":["GET","HEAD"],"domain":null},"project.create":{"uri":"admin\/project\/create","methods":["GET","HEAD"],"domain":null},"project.store":{"uri":"admin\/project","methods":["POST"],"domain":null},"project.show":{"uri":"admin\/project\/{project}","methods":["GET","HEAD"],"domain":null},"project.edit":{"uri":"admin\/project\/{project}\/edit","methods":["GET","HEAD"],"domain":null},"project.update":{"uri":"admin\/project\/{project}","methods":["PUT","PATCH"],"domain":null},"project.destroy":{"uri":"admin\/project\/{project}","methods":["DELETE"],"domain":null},"project.restore":{"uri":"admin\/project-restore\/{id}","methods":["GET","HEAD"],"domain":null},"update-empolyee":{"uri":"admin\/empolyee","methods":["PUT"],"domain":null},"update-client":{"uri":"admin\/client","methods":["PUT"],"domain":null},"update-whatweare":{"uri":"admin\/whatweare","methods":["PUT"],"domain":null},"update-about":{"uri":"admin\/about","methods":["PUT"],"domain":null}},
        baseUrl: 'http://sab.test/',
        baseProtocol: 'http',
        baseDomain: 'sab.test',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
