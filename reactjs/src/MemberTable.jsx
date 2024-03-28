import axios from "axios";
import React,{useState, useEffect} from "react";

const MemberTable = () =>{
const [data, setData] = useState([]);
const [del, setDel] = useState(false);
const [m_id, set_mid] = useState(0);
const [success, isSuccess] = useState(false);

useEffect(()=>{
    displayMember("");
    },[]);
const showMembers = async(event) =>{
    const searchValue = event.target.value;
    displayMember(searchValue);
    
}

const displayMember = async(searchValue) =>{
    try {
        const response = await axios.get(`/API/showMembers?val=${searchValue}`);
        const fetched = response.data;
        console.log(fetched);
        setData(fetched);
        } catch (error) {
            console.log(error);
        }
}


const toDelete = async({mem_id}) =>{
try {
    set_mid(mem_id);
    setDel(true);  
} catch (error) {
    console.error(error);
}
}

const showSuccess = () =>{
    setDel(false);
}

    return(
        <div className="bg-secondary rounded h-100 p-4">
            {success==true && <Message/>}
            {del==true && <ConfirmDelete member={m_id} showData={displayMember}  success={showSuccess}/>}
                            <h6 className="mb-4 col-sm-6"><input type="search" onChange={showMembers} className="form-control" placeholder="Seach name here..." /></h6>
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {data.length>0 && data.map((column)=>
                                    <tr>
                                    <th scope="row">{column.id}</th>
                                    <td>{column.fullname}</td>
                                    <td>{column.contact}</td>
                                    <td>{column.email}</td>
                                    <td><a className="btn btn-sm btn-primary" onClick={()=> toDelete({mem_id:column.id})}> Delete</a></td>
                                </tr>
                                    )}
                                   
                                </tbody>
                            </table>
                        </div>
    );
}



const Message = () =>{
    const [open, setOpen] = useState(true);
    
    const closeModax = () =>{
        setOpen(false);
    }
    return(
    <div>
        {open==true && 
            <div id="modax">
            <div className="modax-body">
                <div className="modax-row modax-header">
                    <h2>SUCCESS</h2>
                </div>
                <div className="modax-row modax-icon">
                    🗑️
                </div>
                <div className="modax-row modax-copies">
                    <span>Data has been deleted.</span>
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



const ConfirmDelete = ({member, showData, success}) =>{
  
    const DelData = async() =>{
    const response = await axios.get(`/API/deleteMember?val=${member}`);
    console.log(response.data);
    showData("");
    success();
    }
  
    return(
 
    <div id="modax">
    <div className="modax-body">
        <div className="modax-row modax-header">
            <h2>CONFIRMATION</h2>
        </div>
        <div className="modax-row modax-icon">
            ❓
        </div>
        <div className="modax-row modax-copies">
            <span>Are you sure to delete this data?</span>
        </div>
        <div className="modax-row">
           <table>
            <tbody>
            <tr>
                <td align="left"><button className="btn btn-dark modax-btn" onClick={success}>CANCEL</button></td>
                <td align="right"><button className="btn btn-primary modax-btn" onClick={DelData}>OKAY</button></td>
            </tr>
            </tbody>
           </table>
        </div>
    </div>
</div>

    )
};




export {MemberTable};