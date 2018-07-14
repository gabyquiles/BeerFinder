import {handleGetBrowserLocation} from "./location"

export function handleChangeLocation() {
    return (dispatch) => {
        dispatch(handleGetBrowserLocation())
    }
}