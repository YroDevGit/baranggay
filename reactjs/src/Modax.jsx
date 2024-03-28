
import React, {useEffect, useState} from "react";

const Modax = ({title, copy, icon}) =>{
    const [open, setOpen] = useState(true);
    
    const closeModax = () =>{
        setOpen(false);
    }
    return(
    <div>
        {open==true && 
            <div id="modax">
            <div className="modax-body w3-animate-zoom">
                <div className="modax-row modax-header">
                    <h2>{title}</h2>
                </div>
                <div className="modax-row modax-icon">
                    {icon}
                </div>
                <div className="modax-row modax-copies">
                    <span>{copy}</span>
                </div>
                <div className="modax-row">
                    <button className="btn btn-primary" onClick={closeModax}>OKAY</button>
                </div>
            </div>
        </div>
        }
    </div>
    )
}

export {Modax};