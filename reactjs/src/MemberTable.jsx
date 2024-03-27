import axios from "axios";
import React,{useState, useEffect} from "react";

const MemberTable = () =>{
const [data, setData] = useState([]);

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


console.log(data);
    return(
        <div className="bg-secondary rounded h-100 p-4">
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
                                    <td><a className="btn btn-sm btn-primary" href="">Delete</a></td>
                                </tr>
                                    )}
                                   
                                </tbody>
                            </table>
                        </div>
    );
}

export {MemberTable};