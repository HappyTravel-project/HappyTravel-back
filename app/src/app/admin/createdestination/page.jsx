import NewDestinationForm from '@/app/components/CreateDestination/NewDestinationForm';
import NewDestinationMobile from '@/app/components/CreateDestination/NewDestinationResponsive';
import LogoMobile from '@/app/components/Logo/LogoMobile';


export default function NewDestination() {
  return (
    <>
      {/* desktop version */}
      <div className="hidden md:flex items-center justify-center h-screen w-screen bg-white p-4 m-0">
        <div className="flex items-center justify-center w-3/5 h-92 border-[#fbfdce] rounded-b-xl px-5 py-7 m-2 p-3">
          <NewDestinationForm title="Crear Destino"/>
        </div>
      </div>
      
      {/* mobile version */}
      <div className='p-6 md:hidden'>
        <div className=""> 
          <div>
            <div className="flex justify-center items-center">
              <div className="mb-6 h-auto">
                <LogoMobile />
              </div>
            </div>
            <NewDestinationMobile title="Crear Destino"/>
          </div>
        </div>
      </div>

    </>
  )
}