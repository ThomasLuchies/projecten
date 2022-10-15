package Chess.Core.StateAnalysers;

import Chess.Core.*;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Queen;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class StalemateAnalyserTests
{
    @Test
    public void returnsStaleMateState() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var stalemateAnalyser = new StalemateAnalyser();
        var board = new Board();
        var blackKing = new King(Color.black, board);
        var queen = new Queen(Color.white, board);
        var whiteKing = new King(Color.white, board);
        board.setPiece(new Coords(1,8), blackKing);
        board.setPiece(new Coords(3,7), queen);
        board.setPiece(new Coords(3,6), whiteKing);
        assertEquals(State.stalemate, stalemateAnalyser.analyse(State.active, board, Color.black));
    }
}