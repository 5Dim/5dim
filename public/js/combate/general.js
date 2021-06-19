//funcion para ajustar el zoom y que no pase del 100%
function ajusta_zoom(nivel){
    var dif = 0;
    if (nivel > 100){
        dif =Math.floor(nivel - 100)
       viewport.zoomPercent(- (dif/100),true)
    }
}