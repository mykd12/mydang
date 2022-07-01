<?php 
function bankCode($code){
  if($code=='11'){
    return "농협중앙회";
  }else if($code=='12'){
    return "단위농협";
  }else if($code=='16'){
    return "축협중앙회";
  }else if($code=='20'){
    return "우리은행";
  }else if($code=='21'){
    return "구)조흥은행";
  }else if($code=='22'){
    return "상업은행";
  }else if($code=='23'){
    return "SC제일은행";
  }else if($code=='24'){
    return "한일은행";
  }else if($code=='25'){
    return "서울은행";
  }else if($code=='26'){
    return "구)신한은행";
  }else if($code=='27'){
    return "한국씨티은행(구 한미)";
  }else if($code=='31'){
    return "대구은행";
  }else if($code=='32'){
    return "부산은행";
  }else if($code=='34'){
    return "광주은행";
  }else if($code=='35'){
    return "제주은행";
  }else if($code=='37'){
    return "전북은행";
  }else if($code=='38'){
    return "강원은행";
  }else if($code=='39'){
    return "경남은행";
  }else if($code=='41'){
    return "비씨카드";
  }else if($code=='45'){
    return "새마을금고";
  }else if($code=='48'){
    return "신용협동조합중앙회";
  }else if($code=='50'){
    return "상호저축은행";
  }else if($code=='53'){
    return "한국씨티은행";
  }else if($code=='54'){
    return "홍콩상하이은행";
  }else if($code=='55'){
    return "도이치은행";
  }else if($code=='56'){
    return "ABN암로";
  }else if($code=='57'){
    return "JP모건";
  }else if($code=='59'){
    return "미쓰비시도쿄은행";
  }else if($code=='60'){
    return "BOA(Bank of America)";
  }else if($code=='64'){
    return "산림조합";
  }else if($code=='70'){
    return "신안상호저축은행";
  }else if($code=='71'){
    return "우체국";
  }else if($code=='81'){
    return "하나은행";
  }else if($code=='83'){
    return "평화은행";
  }else if($code=='87'){
    return "신세계";
  }else if($code=='88'){
    return "신한(통합)은행";
  }else if($code=='89'){
    return "케이뱅크";
  }else if($code=='90'){
    return "카카오뱅크";
  }else if($code=='91'){
    return "네이버포인트(포인트 100% 사용)";
  }else if($code=='92'){
    return "토스뱅크";
  }else if($code=='93'){
    return "토스머니(포인트100% 사용)";
  }else if($code=='94'){
    return "SSG머니(포인트 100% 사용)";
  }else if($code=='96'){
    return "엘포인트(포인트 100% 사용)";
  }else if($code=='97'){
    return "카카오 머니";
  }else if($code=='98'){
    return "페이코 (포인트 100% 사용)";
  }else if($code=='02'){
    return "한국산업은행";
  }else if($code=='03'){
    return "기업은행";
  }else if($code=='04'){
    return "국민은행";
  }else if($code=='05'){
    return "하나은행 (구 외환)";
  }else if($code=='06'){
    return "국민은행 (구 주택)";
  }else if($code=='07'){
    return "수협중앙회";
  }else if($code=='D1'){
    return "유안타증권(구 동양증권)";
  }else if($code=='D2'){
    return "현대증권";
  }else if($code=='D3'){
    return "미래에셋증권";
  }else if($code=='D4'){
    return "한국투자증권";
  }else if($code=='D5'){
    return "우리투자증권";
  }else if($code=='D6'){
    return "하이투자증권";
  }else if($code=='D7'){
    return "HMC투자증권";
  }else if($code=='D8'){
    return "SK증권";
  }else if($code=='D9'){
    return "대신증권";
  }else if($code=='DA'){
    return "하나대투증권";
  }else if($code=='DB'){
    return "굿모닝신한증권";
  }else if($code=='DC'){
    return "동부증권";
  }else if($code=='DD'){
    return "유진투자증권";
  }else if($code=='DE'){
    return "메리츠증권";
  }else if($code=='DF'){
    return "신영증권";
  }else if($code=='DG'){
    return "대우증권";
  }else if($code=='DH'){
    return "삼성증권";
  }else if($code=='DI'){
    return "교보증권";
  }else if($code=='DJ'){
    return "키움증권";
  }else if($code=='DK'){
    return "이트레이드";
  }else if($code=='DL'){
    return "솔로몬증권";
  }else if($code=='DM'){
    return "한화증권";
  }else if($code=='DN'){
    return "NH증권";
  }else if($code=='DO'){
    return "부국증권";
  }else if($code=='DP'){
    return "LIG증권";
  }else if($code=='BW'){
    return "뱅크월렛";
  }

}

function bankCodeCard($code){
  if($code=='11'){
    return "BC카드";
  }else if($code=='12'){
    return "삼성카드";
  }else if($code=='14'){
    return "신한카드";
  }else if($code=='15'){
    return "한미카드";
  }else if($code=='16'){
    return "NH카드";
  }else if($code=='17'){
    return "하나 SK카드";
  }else if($code=='21'){
    return "글로벌 VISA";
  }else if($code=='22'){
    return "글로벌 MASTER";
  }else if($code=='23'){
    return "글로벌 JCB";
  }else if($code=='24'){
    return "글로벌 아멕스";
  }else if($code=='25'){
    return "글로벌 다이너스";
  }else if($code=='91'){
    return "네이버포인트(포인트 100% 사용)";
  }else if($code=='93'){
    return "토스머니(포인트 100% 사용)";
  }else if($code=='94'){
    return "SSG머니(포인트 100% 사용)";
  }else if($code=='96'){
    return "엘포인트(포인트 100% 사용)";
  }else if($code=='97'){
    return "카카오머니";
  }else if($code=='98'){
    return "페이코(포인트 100% 사용)";
  }else if($code=='01'){
    return "외환카드";
  }else if($code=='03'){
    return "롯데카드";
  }else if($code=='04'){
    return "현대카드";
  }else if($code=='06'){
    return "국민카드";
  }

}

?>